<div class="wrapper container-fluid">

    {!! Html::link(route('peoples'),'Назад',['class' => 'btn  btn-link center-block']) !!}

    {!! Form::open(['url' => route('peopleEdit',array('people'=>$data['id'])),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}
        {!! Form::label('name', 'Имя:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', $data['name'], ['class' => 'form-control','placeholder'=>'Введите название страницы']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('position', 'Должность:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('position', $data['position'], ['class' => 'form-control','placeholder'=>'Введите font-awesome название иконки']) !!}
        </div>
    </div>

    <div class="form-group">

        {!! Form::label('text','Описание',['class' => 'col-xs-2 control-label'])   !!}
        <div class="col-xs-8">
            {!! Form::textarea('text',$data['text'],['class' => 'form-control','rows' => '5','placeholder'=>'Введите описание сервиса'])!!}
        </div>

    </div>

    <div class="form-group">
        {!! Form::label('old_images', 'Текущее изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-offset-2 col-xs-10">
            {!! Html::image('public/assets/img/'.$data['images'],'',['width'=>'100px', 'style'=>'border: 1px solid black']) !!}
            {!! Form::hidden('old_images', $data['images']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Новое изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</div>