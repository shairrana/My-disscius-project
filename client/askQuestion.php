<section class="sectionF">
  <div class="container">
    <form action="./server/requests.php" method="post">
      <h1 class="heading center">Ask a Question</h1>
      <div class="mb-3">
        <label for="question" class="form-label">Enter Question</label>
        <input type="text" class="form-control" name="user_question" placeholder="Enetr Your Question">
      </div>
      <div class="mb-3">
        <label for="user_discription" class="form-label">Enter Discription</label>
        <input type="text" class="form-control" name="user_discription" placeholder="discription....">
      </div>
      <?php include("./client/category.php"); ?>
      <button type="submit" name="qus-btn" class="btn btn-primary">Question Submit</button>
    </form>
  </div>
</section>