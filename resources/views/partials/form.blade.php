<form method="POST" action="/" id="news-api-form">

  {{ csrf_field() }}

    <div class="form-group">
      {{-- <label for="source">News Source</label> --}}
      <select style="display: none;" name="source" id="" class="form-control">
        <option value="ALL">All</option>
        <option value="bbc-news">BBC News</option>
        <option value="bbc-sport">BBC sport</option>
        <option value="cbs-news">CBS news</option>
      </select>
      <label for="news-keyword">Search by keyword</label>
      <input type="text" name="q" placeholder="Search by keyword" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="date-from">Date from</label>
      <input type="date" name="from" placeholder="Date From" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="date-to">Date to</label>
      <input type="date" name="to" placeholder="Date To" class="form-control" required>
    </div>
    <div class="form-group">
      <input type="submit" name="submit" class="btn btn-primary">
    </div>
      
    

</form>