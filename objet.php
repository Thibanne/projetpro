<?php
  class Console {
    private $tele;
    private $courant;
    private $manette;
    protected $jeu;
    protected $alumer;

    public function branche(){
      $this->tele=true;
      $this->courant=true;
      $this->manette=true;
      echo 'console branchée<br>';
    }
    public function insererJeux(){
      $this->jeu=true;
      echo 'jeu inséré<br>';
    }
    public function alumer(){
      $this->alumer=true;
      if($this->courant == true){
        echo 'console allumer<br>';
        if($this->jeu == true){
          echo 'le jeu se lance';
        }else{
          echo 'pas de jeu dans la console';
        }
      }else{
        echo 'console eteinte';
      }
    }
  }
  class PS2 extends Console{
    public function insererJeux(){
      if($this->alumer == true){
        $this->jeu=true;
        echo 'jeu inséré<br>';
      }else{
        echo 'console enteinte impossible d\'insere le jeu<br>';
      }
    }
  }
  $nes = new Console();
  // $nes->branche();
  // $nes->insererJeux();
  // $nes->alumer();
  $ps2 = new PS2();
  $ps2->branche();
  $ps2->alumer();
  $ps2->insererJeux();
?>
