<div class="wrapper container-fluid">

    {!! Html::link(route('peoples'),'Назад',['class' => 'btn  btn-link center-block']) !!}

    {!! Form::open(['url' => route('peopleAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <div class="form-group">

        {!! Form::label('name','Имя',['class' => 'col-xs-2 control-label'])   !!}
        <div class="col-xs-8">
            {!! Form::text('name',old('name'),['class' => 'form-control','placeholder'=>'Введите имя сотрудника'])!!}
        </div>

    </div>


    <div class="form-group">
        {!! Form::label('position', 'Должность:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('position', old('position'), ['class' => 'form-control','placeholder'=>'Введите должность сотрудника']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Описание:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'), ['class' => 'form-control','placeholder'=>'Введите описание сотрудника']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
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

    <script>
        CKEDITOR.replace('editor');
    </script>

</div>
