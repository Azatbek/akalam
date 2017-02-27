<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4 bgded overlay" style="background-image:url('images/demo/backgrounds/03.png');">
  <footer id="footer" class="hoc clear">
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h4>Алтын қалам</h4>
      <nav>
        <ul class="nospace">
          //
        </ul>
      </nav>
      <p>Ссылки на социальные сети</p>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fa fa-vk"></i></a></li>
      </ul>
    </div>
    <div class="one_third">
      <h4>Контакты</h4>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          Street Name &amp; Number, Town, Postcode/Zip
          </address>
        </li>
        <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
        <li><i class="fa fa-fax"></i> +00 (123) 456 7890</li>
        <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
      </ul>
    </div>
    <div class="one_third">
      <h4>Реклама</h4>
      <ul class="nospace linklist">
        @foreach($advertisement as $item)
        <li>
            @if($item->type == 1) 
              <iframe width="auto" height="auto" src="https://www.youtube.com/embed/{{$item->src}}" frameborder="0" allowfullscreen></iframe>
            @else
              <a href="{{$item->link}}" target="_blank" rel="nofollow"><img src="{{$item->src_pic}}" width="220"/></a>
            @endif
        </li>
        @endforeach
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
