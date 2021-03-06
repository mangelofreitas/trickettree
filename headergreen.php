<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="index.php" style="color:rgb(43,222,115)">Tree Baking</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php" style="color:rgb(43,222,115)">Notifications</a></li>
                <div class="col-sm-3 col-md-3">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input style="background-color:transparent;border-color:transparent" type="text" class="form-control" placeholder="Search ">
                        </div>
                    </form>
                </div>
                <li class="active"><a href="communitytree.php" style="color:rgb(43,222,115)">Community Tree</a></li>
                <!--<li class="active"><a href="#" style="color:rgb(43,222,115)" data-toggle="modal" data-target="#createModal">Create Tree</a></li> -->
                <?php
                if(isset($_SESSION['name']))
                {
                    echo '<li class="active"><a style="color:rgb(43,222,115)" href="profile.php">'.$_SESSION['name'].'</a></li>';
                }
                ?>
                <li class="login"><?php if(!isset($_SESSION['loggedin']))
                                        {
                                            include('login.php');
                                        }
                                        else
                                        {
                                            echo '<li class="active"><a href="404.html" style="color:rgb(43,222,115)">Notifications</a></li>';
                                            echo '<a href="#" data-toggle"modal" style="color:rgb(43,222,115)" data-target"#createModal">Grow Tree </a></li>';
                                            echo '<a href="logout.php" style="color: rgb(58, 87, 149)" href="profile.html">Log Out<i style="font-size:18px;padding-left:10px" class="fa fa-facebook"></i> </a>';
                                        }
                                        ?></li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
 <div class="modal fade" id="createModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tree Creation</h4>
        </div>
        <div class="modal-body">
          <input style="background-color:transparent;border-color:transparent" type="text" class="form-control" placeholder="Root of the idea (ex: Music App)">
          <textarea class="form-control" rows="5" id="comment" placeholder="Description of the idea (if it needs one)"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-primary">Grow Tree! </button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>

    </div>
  </div>
