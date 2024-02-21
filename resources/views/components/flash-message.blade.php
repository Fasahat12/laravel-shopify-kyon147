@if(session()->has('message'))
    <div  x-data="{show: true}" x-init="setTimeout(() => show=false,3000)" x-show="show" class="alert success">
        <dl>
          <dt>Success Alert</dt>
          <dd>{{session('message')}}</dd>
        </dl>
      </div>
@endif