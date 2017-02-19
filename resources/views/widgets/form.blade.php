<div class="wrapper bgded" style="background-image:url('images/backgrounds/03.jpg');">
  <section id="callback" class="hoc container clear">
    <!-- ################################################################################################ -->
    <div class="one_half first">
      <div class="inspace-30 row3">
        <h6 class="heading">{{trans('default.home.form-title')}}</h6>
        <p class="btmspace-30">{{trans('default.home.form-description')}}</p>
        {!! Form::open(['url' => '/'.app()->getLocale().'/lyrics/store', 'name' => 'sendForm']) !!}
            <fieldset>
              {!! Form::text('title', null, ['placeholder' => trans('default.form.title'), 'class' => 'form-control', 'required']) !!}
              {!! Form::select('lang', [0=>trans('default.home.langs.kk'), 1=>trans('default.home.langs.ru')], null, ['placeholder' => trans('default.form.lang'), 'class' => 'form-control', 'required']) !!}
              <br/>
              {!! Form::textarea('content', null, ['placeholder' => trans('default.form.content'), 'class' => 'form-control', 'required']) !!}
              <br/>
              {!! Form::select('category_id', App\Models\Category::orderBy('parent_id')->pluck('name', 'id'), null, ['placeholder' => trans('default.form.category'), 'class' => 'form-control', 'required']) !!}
              <br/>
              {!! Form::text('author', null, ['placeholder' => trans('default.form.name'), 'class' => 'form-control', 'required']) !!}
              <div class="g-recaptcha" data-sitekey="6LexFBYUAAAAAKzu5Iwbh5SENFUbc7u57RBiRYfW"></div>
              <br/>
              {!! Form::button(trans('default.form.send'), ['class'=>'btn btn-send']); !!}
            </fieldset>
        {!! Form::close() !!}
      </div>
    </div>
    <!-- ################################################################################################ -->
  </section>
</div>
