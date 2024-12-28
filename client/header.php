<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Question/Answer</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="#">Home</a>
        </li>
            <?php
            if(isset($_SESSION['user']['username'])){ ?>
                <li class="nav-item">
                <a class="nav-link" href="?loginout=true">Login Out</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?ask=true">Ask a Question</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?user-id=<?php echo isset($_SESSION['user']['userId']) ?>">My Questions</a>
        </li>
           <?php } else { ?>
            <li class="nav-item">
          <a class="nav-link" href="?sign=true">Sign Up</a>
        </li>
            <li class="nav-item">
          <a class="nav-link" href="?login=true">Login</a>
        </li>
           <?php } ?>

        <li class="nav-item">
          <a class="nav-link" href="#">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Letest Question</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
