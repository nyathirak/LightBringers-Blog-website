      <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-primary">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Home </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../MakeUpCourseWorkTakeHome/about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../MakeUpCourseWorkTakeHome/contactus.php">Contact Us</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../MakeUpCourseWorkTakeHome/view.php">View Articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../MakeUpCourseWorkTakeHome/signup.php">Sign Up</a>
          </li>
            <?php
                if(isset($_SESSION["control"])){
            ?>
                <li class="nav-item active">
                    <a class="nav-link" href="processes/signOut.php">Sign Out</a>
                </li>
            <?php
                }
            ?> 
        
</ul>
      <div class = "text-white mr-sm-2">
        <h5> 
        
          <?php
          
          if(isset($_SESSION["control"])){
            print "Hello " . $_SESSION["control"]["Full_Name"];
             }
          ?> 
        </h5>
      </div>
          
          </div>

        </ul>
        
      </div>

    </nav>