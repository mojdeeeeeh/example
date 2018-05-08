<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<style>


body {
  display: flex;
  justify-content: center;
}

.ball {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background-color: red;

  animation: bounce 1s;
  animation-direction: alternate;
  animation-timing-function: cubic-bezier(.5,0.05,1,.5);
  animation-iteration-count: infinite;
}

@keyframes bounce {
  from { transform: translate3d(0, 600px, 0);     }
  to   { background-color:yellow; transform: translate3d(0, 800px, 0); }
}

/* Prefix Support */
ball {
  -webkit-animation-name: bounce;
  -webkit-animation-duration: 0.5s;
  -webkit-animation-direction: alternate;
  -webkit-animation-timing-function: cubic-bezier(.5,0.05,1,.5);
  -webkit-animation-iteration-count: infinite;
}

@-webkit-keyframes bounce {
  from { -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); }
  to   { -webkit-transform: translate3d(0, 200px, 0); transform: translate3d(0, 200px, 0); }
}

.ball:active {
  height: 250px;
  width: 250px;
  margin: 0 auto;
  background-color: red;
  animation-name: stretch;
  animation-duration: 1.5s; 
  animation-timing-function: ease-out; 
  animation-delay: 0;
  animation-direction: alternate;
  animation-iteration-count: infinite;
  animation-fill-mode: none;
  animation-play-state: running;
}

@keyframes stretch {
  0% {
    transform: scale(1.5);
    background-color: red;
    border-radius: 50px;
  }
  50% {
    background-color: orange;
  }
  100% {
    transform: scale(.3);
    background-color: yellow;
  }
}



</style>
</head>
<body>


<div class="ball"></div>




</body>
</html>
