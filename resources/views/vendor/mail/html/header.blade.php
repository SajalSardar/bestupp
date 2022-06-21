<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('storage/uploads/logo/'. themeoptions()->logo) }}" width="100" alt="{{ config('app.name') }}">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
