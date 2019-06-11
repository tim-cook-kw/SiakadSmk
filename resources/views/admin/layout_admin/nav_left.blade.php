<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title"><i class="fa fa-icon-user"></i><a href="{{Route('tampil.siswa')}}">Siswa</a></li>
                <li class="menu-title"><i class="fa fa-icon-user"></i><a href="{{Route('tampil.guru')}}">Guru</a></li>
                <li class="menu-title"><i class="fa fa-icon-user"></i><a href="{{Route('tampil.jurusan')}}">Jurusan</a></li>
                <li class="menu-title"><i class="fa fa-icon-user"></i><a href="{{Route('tampil.mapel')}}">Mapel</a></li>
                <li class="menu-title"><i class="fa fa-icon-user"></i><a href="{{Route('infosekolah.index')}}">Info Sekolah</a></li>
                <li class="menu-title"><i class="fa fa-icon-user"></i><a href="{{Route('tampil.kelas')}}">Kelas</a></li>

                {{-- Navigasi Berita --}}
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Berita</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="{{Route('tampil.berita')}}">Lihat Berita</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="{{Route('tampil.tag')}}">Tambah Tags</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->