<?php

// class : 동종의 객체들을 모아 정의한 것
// 관습적으로 파일명과 클래스명을 동일하게 지어준다.
class Whale {
    // 접근 제어 지시자
    // public   : class 외부, 내부 어디에서 접근 가능
    public $str1;
    // private : class 내부에서만 접근 가능, 외부는 접근 불가능
    private $i;
    // protected: class 내에서만 접근 가능, 외부에서는 접근 불가능, 단, 상속관계에서는 접근 불가능
    protected $boo;

    private $name;

    //생성자 메소드
    public function __construct($name) {
        $this->name = $name;
    }

    // getter / setter : private이나 protected로 설정된 프로퍼티에 접근을 위해 사용하는 메소드
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }


    // 메소드
public function swim($opt) {
    echo $opt.$this->name." 헤엄 칩니다.";
 }
 public function breathe() {
    echo $this->name."호흡 한다.\n";
 }

 // static 메소드 : 인스턴스 생성 없이 사용할 수 있는 메소드
 public static function big(){
    echo " 매우 크다.";
 }
}

// 클래스 인스턴스 생성
$obj_whale = new whale("고래");
// whale 클래스를 변수에 지정하고
$obj_whale ->swim("흰 수염");
// 클래스의 특정 메소드를 호출
echo $obj_whale->getName()."\n";
$obj_whale->breathe();
$obj_whale->setName("참새");
$obj_whale->swim("흰 수염 ");
$obj_whale->breathe();

echo "\n";

// shark 클래스를 만들어주세요.
// 프로퍼티 : private $name
// 생성자 메소드 : whale 클래스랑 동일하게
// 메소드 : public swim, public breathe

// shark 클래스 
class Shark {
// 프로퍼티 
    private $name;
// 생성자
    public function __construct($name) {
        $this->name = $name;
    }
// 메소드
    public function swim($opt){
        echo $opt.$this->name." 헤엄 칩니다.";
    }
    public function breathe() {
        echo $this->name." 호흡 한다.\n";
     }
}
$obj_whale = new Shark("상어");
$obj_whale ->swim("큰 ");
$obj_whale ->breathe();

// static 메소드 호출
whale::big();
