  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach(getCategories() as $key => $cat)
                    <a class="nav-link {{ $category != null && $cat->id == $category->id ? 'active' : '' }}" id="v-pills-slug{{$cat->id}}-tab" data-toggle="pill" href="#v-pills-apple" role="tab" aria-controls="v-pills-apple" aria-selected="true"><i class="fas fa-plus"></i> {{ $cat->name }}</a>

                    <div class="v-pills-slug{{$cat->id}}-tab" id="item-hidden">
                        <ul class="list-unstyled">
                            @foreach($cat->children as $sub)
                            <li><a href="">- {{ $sub->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>