<nav class="navbar navbar-fixed-top navbar-inverse" style="background-color: #1B3F8B;">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ link_to_route('frontend.index',app_name(), [], ['class' => 'navbar-brand']), ['style' => 'color:#ffffff'] }}
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#home">Home</a></li>
                <li><a href="#announcement"><span style="color:#ffffff " >Announcement</span></a></li>
                <li><a href="#video"><span style="color:#ffffff " >Video</span></a></li>
                <li><a href="#calendar"><span style="color:#ffffff " >Events</span></a></li>
                <li><a href="#post"><span style="color:#ffffff " >Information Post</span></a></li>

            </ul>
        </div><!--/.nav-collapse -->


</nav>
