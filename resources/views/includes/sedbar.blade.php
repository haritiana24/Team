<!-- Sidebar -->
        <div id="sidebar-wrapper" style="height:100%">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                </li>
                <li>
                    <a href="{{route('home.create')}}">Créer une utilisateur</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        CMS
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item item-section" href="{{route("header.index")}}">Gestion de header</a>
                        <a class="dropdown-item item-section" href="{{route("section.index")}}">Gestion de section</a>
                        <a class="dropdown-item item-section" href="{{route("footer.index")}}">Gestion de footer</a>
                    </div>
                </li>
            </ul>
        </div>
<!-- end of sidebar wrapper -->
