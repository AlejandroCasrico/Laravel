@include('section.header')
<script src="https://cdn.tailwindcss.com"></script>
<div class="flex flex-col" style="margin: 20px">
<h2>Id: {{ $alert->id }}</h2><br>
<h2>Description: {{ $alert->alert_type }}</h2><br>
<h2>Classification: {{ $alert->classification }}</h2><br>
<h2>Priority: {{ $alert->priority }}</h2><br>
<h2>Protocol: {{ $alert->protocol  }}</h2><br>
<h2>source address: {{ $alert->src_address  }}</h2><br>
<h2>detination address: {{ $alert->dest_address }}</h2><br>
<h2>register: {{ $alert->timestamp }}</h2><br>


<form method="POST" action="{{ route('solution') }}">
    @csrf
    @if($detail)
<input type="hidden" name="alert_id" value="{{ $alert->id }}">
<label>Severidad:</label>
<select name="severidad">
    <option value="1" {{ $detail->severidad==1? 'selected' : '' }}>BAJO</option>
    <option value="2" {{ $detail->severidad==2? 'selected' : '' }}>MEDIO</option>
    <option value="3" {{ $detail->severidad==3? 'selected' : '' }}>ALTO</option>
</select>
<label>Falso positivo:</label>
<select name="falsoPositivo">
    <option value="1" {{ $detail->falsoPositivo==1? 'selected' : '' }}>SI</option>
    <option value="0" {{ $detail->falsoPositivo==0? 'selected' : '' }}>NO</option>
</select>
<label>Incidente confirmado:</label>
<select name="incidentesConfirmado">
    <option value="1" {{ $detail->incidentesConfirmado==1 ? 'selected' : '' }} >SI</option>
    <option value="0" {{ $detail->incidentesConfirmado==0 ? 'selected' : '' }}>NO</option>
</select>
<label>Action correctivas:</label>
<input type="text" value="{{ $detail->accionesCorrectivas ?? ''}}" name="accionesCorrectivas">
@else
<input type="hidden" name="alert_id" value="{{ $alert->id }}">
<label>Severidad:</label>
<select name="severidad">
    <option value="1" >BAJO</option>
    <option value="2">MEDIO</option>
    <option value="3" >ALTO</option>
</select>
<label>Falso positivo:</label>
<select name="falsoPositivo">
    <option value="1" >SI</option>
    <option value="0" >NO</option>
</select>
<label>Incidente confirmado:</label>
<select name="incidenteConfirmado">
    <option value="1"  >SI</option>
    <option value="0" >NO</option>
</select>
<label>Action correctivas:</label>
<input class="bg-slate-300" type="text" value="" name="accionesCorrectivas">
@endif
<button type="submit" class="bg-gray-500 hover:bg-gray-300 text-white font-bold py-2 px-4 rounded ml-2">
    <i class="fas fa-save mr-2"></i>Guardar
</button>
</form>
</div>
