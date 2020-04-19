{{--
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                @foreach($categories as $k => $cat)
                    @foreach($cat as $key => $subcat)
                        @if (is_array($subcat->children))
                           <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('category.show', $subcat->slug) }}" id="{{ $subcat->slug }}"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $subcat->name }}</a>
                            <div class="dropdown-menu" aria-labelledby="{{ $subcat->slug }}">
                                @foreach($subcat->children as $children)
                                    <a class="dropdown-item" href="{{ route('category.show', $children['slug']) }}">{{ $children['name'] }}</a>
                                @endforeach
                            </div>
                           </li>
                           @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.show', $subcat->slug) }}">{{ $subcat->name }}</a>
                            </li>
                        @endif
                    @endforeach
                  @endforeach
            </ul>
        </div>
    </div>
</nav>


--}}

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                @foreach($categories as $cat)
                    @foreach($cat->items as $category)
                        @if ($category->items->count() > 0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="{{ $category->slug }}">
                                    @foreach($category->items as $item)
                                        <a class="dropdown-item" href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a>
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</nav>
