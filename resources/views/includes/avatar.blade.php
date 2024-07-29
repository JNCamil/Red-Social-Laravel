                              <div class="avatar">
                              <!--Comprobar que el usuario tiene una imagen-->
                              @if(Auth::user()->image)

                              <img src="{{  route('user.avatar', ['filename'=>Auth::user()->image])}}" alt="" class="avatar">
                              <!-- Con URL: -->
                              <!--<img src="{{  url('/user/avatar/'.Auth::user()->image)}}" alt="">-->
      
                              @endif
                            </div>