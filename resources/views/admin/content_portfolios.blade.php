<div style="margin:0px 50px 0px 50px;">

    @if($portfolios)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фильтр</th>
                <th>Картинка</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>

            @foreach($portfolios as $k => $item)

                <tr>

                    <td>{{ $item->id }}</td>
                    <td>{!! Html::link(route('portfolioEdit',['portfolio'=>$item->id]),$item->name,['alt'=>$item->name]) !!}</td>
                    <td>{{ $item->filter }}</td>
                    <td>{!! Html::image('public/assets/img/'.$item->images,'',['width'=>'50']) !!}</td>
                    <td>{{ $item->created_at }}</td>

                    <td>
                        {!! Form::open(['url'=>route('portfolioEdit',['portfolio'=>$item->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

                        {{--{!! Form::hidden('_method','delete') !!}--}}

                        {{ method_field('delete') }}
                        {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>

            @endforeach


            </tbody>
        </table>
    @endif

    {!! Html::link(route('portfolioAdd'),'Новая работа',['class' => 'btn btn-success']) !!}

</div>
<br>