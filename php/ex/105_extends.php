<?php
// 상속 : 부모클래스의 자원을 자식클래스가 물려받아 사용하거나 재정의 하는 것

class parents {
  protected $name;
// private는 오직 부모만 쓸 수 있다
    public function __construct(){
        echo "부모클래스 생성자 실행\n";
    }
    private function home(){
        echo "집은 부모님 겁니다.";
    }
    public function car() {
        echo "차은 부모님 자식 다 씁니다.\n";
    }
}

class Child extends parents{

    public function __construct($name){
        $this->name = $name;
        echo "자식클래스 생성자 실행\n";
    }
    public function dog() {
        echo "강아지는 제겁니다.";
    }
    // 오버 라이딩 : 부모의 메소드를 자식에서 재정의해서 사용
    public function car() {
        echo "이 자동차는 이제 제겁니다.";
    }

    public function getName() {
        echo $this->name;
    }
}

$obj = new Child("홍길동");
// cunstruct 생성자를 실행 자식요소에 없을경우 부모요소에서 가져와서 실행
$obj->car();
$obj->getName();