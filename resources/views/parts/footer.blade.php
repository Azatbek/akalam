<footer id="footer" class="hoc clear">
<div class="display-table">
  @foreach($partners as $item)
    <div class="col-md-3 col-lg-3 display-cell">
      <div style="display: flex; align-items: center;justify-content: center;">
        <a href="{{$item->link}}" target="_blank">
          <center><img src="{{url('/'.$item->logo)}}"></center>
        </a>
      </div>
    </div>
  @endforeach
  </div>
  </footer>
  <style>
    .display-table{
    display: table;
    table-layout: fixed;
    }

    .display-cell{
        display: table-cell;
        vertical-align: middle;
        float: none;
    }
  </style>
