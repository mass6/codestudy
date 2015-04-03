<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/notes">CodeStudy</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="{{ isPath('notes') }}"><a href="{{ route('notes.index') }}">Notes</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Metadata <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('categories.index') }}">Categories</a></li>
                <li><a href="{{ route('platforms.index') }}">Platforms</a></li>
                <li><a href="{{ route('languages.index') }}">Languages</a></li>
                <li><a href="{{ route('frameworks.index') }}">Frameworks</a></li>
                <li><a href="{{ route('tags.index') }}">Tags</a></li>
              </ul>
            </li>
          </ul>
          {!! Form::open(['route'=>'search', 'class'=>'navbar-form navbar-right']) !!}
              <input type="text" id="searchbox" name="searchbox" class="form-control" placeholder="Search...">
          {!! Form::close() !!}
          <ul class="nav navbar-nav navbar-right">
            <li class="{{ isPath('notes/create') }}"><a href="{{ route('notes.create') }}"><i class="fa fa-plus"></i>  Note</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>