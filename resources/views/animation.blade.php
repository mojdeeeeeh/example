<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<style>
    div {
    width: 100px;
    height: 100px;
    background: red;
    -webkit-transition: width 2s, height 2s, -webkit-transform 2s; /* Safari */
    transition: width 2s, height 2s, transform 2s;
    position: relative;
    -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
    -webkit-animation-duration: 10s; /* Safari 4.0 - 8.0 */
    -webkit-animation-name: example;
    -webkit-animation-duration: 5s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-delay: 2s;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-direction: alternate;
    /* Standard syntax */
    animation-name: example;
    animation-duration: 5s;
    animation-timing-function: linear;
    animation-delay: 2s;
    animation-iteration-count: infinite;
    animation-direction: alternate;

}

div:hover {
    width: 200px;
    height: 200px;
    -webkit-transform: rotate(360deg); /* Safari */
    transform: rotate(360deg);
}
/* Safari 4.0 - 8.0 */
@-webkit-keyframes example {
    0%   {background-color:red; left:0px; top:0px;}
    25%  {background-color:yellow; left:200px; top:0px;}
    50%  {background-color:blue; left:400px; top:0px;}
    75%  {background-color:green; left:600px; top:0px;}
    100% {background-color:red; left:800px; top:0px;}
}

/* Standard syntax */
@keyframes example {
    0%   {background-color:red; left:0px; top:0px;}
    25%  {background-color:yellow; left:200px; top:0px;}
    50%  {background-color:blue; left:400px; top:0px;}
    75%  {background-color:green; left:600px; top:0px;}
    100% {background-color:red; left:800px; top:0px;}
}

.element {
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
    transform: scale(.3);
    background-color: red;
    border-radius: 100%;
  }
  50% {
    background-color: orange;
  }
  100% {
    transform: scale(1.5);
    background-color: yellow;
  }
}

body,
html {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  justify-content: center;
}

</style>
</head>
<body>

<div>hiii</div>
<hr />


<div class="element"></div>


</body>
</html>
