<?php
/**
 * CREATE TABLE session(
 * `id` VARCHAR(255) UNIQUE NOT NULL,
 *  `payload` TEXT,
 *  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 *  `update_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
 * );
 */

ini_set('session.gc_maxlifetime', 10);


/**
 * Session Handler Interface
 */

//정확히 언제 사용하는가?
//Session은 기본적으로 파일로 저장이 되는데
//데이터 베이스에 세션을 저장 한다던지 레딧스에 저장한다? 이 부분은 정확하게 알아보아야 할거 같다

//이미 mysql에 데이터베이스를 생성해놓고 시작을 하였다
class DatabaseSessionHandler implements SessionHandlerInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function open($save_path, $session_name)
    {
        return true;
    }

    public function read($session_id)
    {
        $sth = $this->pdo->prepare('SELECT * FROM sessions WHERE `id` = :id '); //왜 이런식으로 쿼리는 짜는지 모르겠다
        if ($sth->execute([':id' => $session_id])) {
            if ($sth->rowCount() > 0) {
                $payload = $row->fetchObject()->payload; // 그렇네 초기화가 되지 않았는데 어떻게? 들어가지?
            } else {
                $sth = $this->pdo->prepare('INSERT INTO sessions(`id`) VALUES(:id)');
                $sth->execute([`:id` => $session_id]);
            }
        }
        return $payload ?? '';
    }

    public function write($session_id, $session_data)
    {
        $sth = $this->pdo
            ->prepare('UPADTE sessions SET `payload` = :payload WHERE `id` = :id')
            ->execute([':payload' => $session_id, ':id' => $session_data]);
    }

    public function gc($maxlifetime)
    {
        $sth = $this->pdo->prepare('SELECT * FROM sessions');
        if($sth->execute()) {
            while($row = $sth->fetchObject()) {
                $timestamp = strotime($row->created_at);
                if(time() - $timestamp->$maxlifetime) {
//                    $this->pdo
//                        ->prepare('DELETE FROM sessions WHERE `id` = :id');
//                        ->execute([':id' => $row->id]);
                    $this->destroy($row->id);
                }
            }
            return true;
        }
        return true;
    }
    public function destroy($session_id)
    {
        return $this->pdo
            ->prepare('DELETE FROM sessions WHERE `id` = :id')
            ->execute([':id' => $session_id]);
    }

    public function close()
    {
        return true;
    }
}

session_set_save_handler();

session_start();

//$_SESSION['message'] = 'Hello world';
//$_SESSION['foo'] = new stdClass();

session_gc();