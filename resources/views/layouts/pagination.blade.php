<?php
?>
<div class="d-flex justify-content-center">
<nav aria-label="...">
    <ul class="pagination pagination-sm">
        @for ($i = 1; $i <= $count; $i++)
            @if ($i == $page)
                <li class="page-item disabled">
                    <a class="page-link" href="/collections/page-{{$i}}" tabindex="-1">{{$i}}</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="/collections/page-{{$i}}">{{$i}}</a>
                </li>
            @endif
        @endfor
    </ul>
</nav>
</div>
