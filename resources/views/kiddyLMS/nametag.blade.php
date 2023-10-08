<div class="bubble bubble-bottom-left" >Hey there Friend!!</div>
<div class="bubble bubble-bottom-left" >You're logged in as: {{ auth()->user()->name }}</div>
@if (Auth::user()->grade)
                <div class="bubble bubble-bottom-left" >Your Grade: {{ Auth::user()->grade->grade }}</div>
                @else
                <div class="bubble bubble-bottom-left">Not assigned to a grade</div>
                @endif
                @if (Auth::user()->class)
                <div class="bubble bubble-bottom-left" >Your Class: {{ Auth::user()->class->class_name }}</div>
                @else 
                <div class="bubble bubble-bottom-left" >Not assigned to a class</div>
@endif

<style>
    body {
  background: #fbcfe8;
  
}

.bubble {
  position: relative;
  font-family: sans-serif;
  font-size: 18px;
  line-height: 24px;
  width: 300px;
  background: #e06666;
  border-radius: 40px;
  padding: 24px;
  text-align: center;
  color: #000;
  border-style:solid;
  border-color:black;
}

.bubble-bottom-left:before {
  content: "";
  width: 0px;
  height: 0px;
  position: absolute;
  border-left: 24px solid #e06666;
  border-right: 12px solid transparent;
  border-top: 12px solid #e06666;
  border-bottom: 20px solid transparent;
  left: 32px;
  bottom: -24px;
}

</style>