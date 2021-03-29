@if($groupButton->getType() == 'buttons')
    @foreach($groupButton->getButtons() as $button)
        <a href="{{route($button->getRoute(), $button->getParameters())}}" class="{{$button->getClass()}}">
            @if($button->getIcon()) <i class="{{$button->getIcon()}}"></i> @endif
            {{$button->getLabel()}}
        </a>
    @endforeach
@endif
