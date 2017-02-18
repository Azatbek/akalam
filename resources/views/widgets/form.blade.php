<div class="wrapper bgded" style="background-image:url('images/backgrounds/02.png');">
  <section id="callback" class="hoc container clear">
    <!-- ################################################################################################ -->
    <div class="one_half first">
      <div class="inspace-30 row3">
        <h6 class="heading">{{trans('default.home.form-title')}}</h6>
        <p class="btmspace-30">{{trans('default.home.form-description')}}</p>
        {!! Form::open(['url' => '/'.app()->getLocale().'/lyrics/store', 'name' => 'sendForm']) !!}
            <fieldset>
              {!! Form::text('title', null, ['placeholder' => 'Имя', 'required']) !!}
              {!! Form::select('lang', [0=>'Қазақша', 1=>'Русский'], null, ['placeholder' => 'На каком языке?', 'class' => 'form-control', 'required']) !!}
              {!! Form::textarea('content', null, ['placeholder' => 'Сюда отправляем сочинение', 'class' => 'form-control', 'required']) !!}
              {!! Form::select('category_id', App\Models\Category::orderBy('parent_id')->pluck('name', 'id'), null, ['placeholder' => 'Сюда отправляем сочинение', 'class' => 'form-control', 'required']) !!}
              {!! Form::text('author', null, ['placeholder' => 'Ваше имя', 'class' => 'form-control', 'required']) !!}
              {!! Form::button('Отправить', ['class'=>'btn btn-send']); !!}
            </fieldset>
        {!! Form::close() !!}
      </div>
    </div>
    <!-- ################################################################################################ -->
  </section>
</div>
