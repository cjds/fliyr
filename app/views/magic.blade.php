@extends('layouts.master')


@section('content')
<div id ='content'>
</div>
<div id ='dialog' class='reveal-modal' data-reveal>
</div>
<script type="text/javascript">

 $(document).ready(function() { 
	routingUpdate();


});
</script>

@stop

@include('templates.ventures ')