<?php
    class User
    {
        private $userName;
        private $userPassword;
        private $userEmail;
        private $userRoomNumber;
        private $userFloorNumber;
        private $userPicturePath;


        function __construct()
        {
                $userName="";
                $userPassword="";
                $userEmail="";
                $userRoomNumber="";
                $userFloorNumber=0;
                $userPicturePath="";
        }
        ////////////////////////////////////////////////////////////////////////////
        public function setUserName($name)//setter
        {
            $this->userName=$name;
        }
        public function getUserName()//getter
        {
            return $this->userName;
        }

        ////////////////password///////////////////////////
        public function setUserPassword($password)//setter
        {
            $this->userPassword=$password;
        }
        public function getUserPassword()//getter
        {
            return $this->userPassword;
        }

        ////////////////////////////////////////////////////////
        public function setUserEmail($email)//setter
        {
            $this->userEmail=$email;
        }
        public function getUserEmail()//getter
        {
            return $this->userEmail;
        }
        ////////////////////////////////////////////////////////
        public function setUserRoomNumber($room)//setter
        {
            $this->userRoomNumber=$room;
        }
        public function getUserRoomNumber()//getter
        {
            return $this->userRoomNumber;
        }
        ////////////////////////////////////////////////////////
        public function setUserFloorNumber($floor)//setter
        {
            $this->userFloorNumber=$floor;
        }
        public function getUserFloorNumber()//getter
        {
            return $this->userFloorNumber;
        }
        ////////////////////////////////////////////////////////
        public function setUserProfilePic($imagePathName)//setter
        {
            $this->userPicturePath=$imagePathName;
        }
        public function getUserProfilePic()//getter
        {
            return $this->userPicturePath;
        }
        ///////////////////////// ///////////////////////////////////////
        public function getLoginData()
        {
            return [$this->userEmail,$this->userPassword];
        }
        /////////////////////////////////////////////////////////////////
        public function getRegisterData()
        {
            return [$this->userName,$this->userEmail,$this->userPassword,$this->userRoomNumber,$this->userFloorNumber,$this->userPicturePath];
        }
        /////////////////////////////////////////////////////////////////
        public function validateChecker($str)
        {
            $str=trim($str);
            $str=stripslashes($str);
            $str=htmlspecialchars($str);
            return $str;
        }
        public function validateCheckerAll()
        {
            $this->userName=$this->validateChecker($this->userName);
            $this->userEmail=$this->validateChecker($this->userEmail);
            $this->userRoomNumber=$this->validateChecker($this->userRoomNumber);
            $this->userFloorNumber=$this->validateChecker($this->userFloorNumber);
        }
    }