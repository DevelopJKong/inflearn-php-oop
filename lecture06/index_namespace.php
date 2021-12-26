<?php
/**
 * Namespaces
 */

// 다른 곳들 보다도 중요합니다 / 확실하게 알아두어야합니다
// modern php의 근간이 되는 개념입니다

//Namespace는 구역을 나눌수있습니다
//namespace A; // => 프로젝트 할때는 이런식으로 진행을 하겠습니다

//var_dump는 글로벌 네임스페이스에 선언된 함수입니다

//namespace는 계층형식으로 있습니다 때문에 한계단 한계단 씩 올라가면서 검증을 합니다

// 원래는 한 파일에는 하나의 namespace만 주어야 한다 강의를 위해서 이렇게 준것이다
namespace A 
{
    const MESSAGE = __NAMESPACE__;

    class A {
        public function foo()
        {
            return __METHOD__;
        }
    }
    function foo()
    {
        return __FUNCTION__;
    }
    function var_dump()
    {
        return __FUNCTION__;
    }

    var_dump();
    \var_dump(); // 글로벌 namespace를 호출하고 싶었다면 이렇게 "\" 를 사용해줘야 한다
}

namespace A\B // 자식 namespace입니다
{
    class A {
        public function foo() {
            return __METHOD__;
        }
    }
}


namespace { // 글로벌 namespace 입니다
    use A\A; // 이뜻은 A namespace 안에 있는 A class를 사용하겠다는 뜻입니다
    use A\B\A as AB;
    use function A\foo;
    //$a = new A();
    $a = new A\A();

    var_dump( $a -> foo());
}