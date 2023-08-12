@extends('plantilla.plantilla')
@section('titulo','Easy Vote | Results')


@section('contenido') 
<style> 
table {
	width: 800px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,
td {
	padding: 15px;
	background-color: rgba(255,255,255,0.2);
	color: #fff;
}

th {
	text-align: left;
}

thead {
	th {
		background-color: #55608f;
	}
}

tbody {
	tr {
		&:hover {
			background-color: rgba(255,255,255,0.3);
		}
	}
	td {
		position: relative;
		&:hover {
			&:before {
				content: "";
				position: absolute;
				left: 0;
				right: 0;
				top: -9999px;
				bottom: -9999px;
				background-color: rgba(255,255,255,0.2);
				z-index: -1;
			}
		}
	}
}
</style> 
<script>
	function copyCode(id) {
		let code = document.getElementById(id).textContent; 	
		
		let btn = document.getElementById("btn_"+id); 
		btn.value = "copy";
		navigator.clipboard.writeText(code)
		.then(() => {
					//btn.value ="copied";
                })
                .catch((error) => {
					// Puede haber error porque tiene que estar en servidor HTTPS
					btn.value ="error";
                });  
	} 
</script>
<h1 style="color:white;">
	<a href="#" onClick="copyCode('questionCode');">
    {{ $description }} <p>
		<hr>
	Question code: <i><span id="questionCode">{{ $code }}</span> <input type="button" id="btn_questionCode" value="copy"/></i>
	</p>
</a>
</h1>
        <div class="container">
            <table>
                <thead>
                    <tr>
                    <th>N&deg;</td>
                    <th>Key Code</td>
                    <th>Status</td>
                    </tr>
                </thead>
            <tbody>
            @foreach($votes as $vote)
                <tr style="background:rgb(23, 23, 31);">
                <td>{{ $loop->index+1 }}</td>
                <td>
					<a href="#" onClick="copyCode('{{ $vote->link_code }}');">
						<div style='display:inline-block;width:100px;'>
				 		<span id="{{$vote->link_code}}">{{ $vote->link_code }}</span>
						</div><input type="button" id="btn_{{$vote->link_code}}" value="copy"/>
					</a>
				</td>
                <td>
                @if($vote->status == 1)
                Available
                @elseif($vote->status == 0)
                Used
                @endif
                </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>  
        </div>
         
        <button type="submit" class="submit" style="background:#223353;margin-top:10px;">Generate excel</button>
@endsection