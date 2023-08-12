@extends('plantilla.plantilla')
@section('titulo','Easy Vote')
@section('scripts')
function hideAll() {
    document.getElementById('create-body').style.display = 'none';
    document.getElementById('vote-body').style.display = 'none';
    document.getElementById('view-body').style.display = 'none';
    document.getElementById('create-button').style.display = 'block';
    document.getElementById('vote-button').style.display = 'block';
    document.getElementById('view-button').style.display = 'block';
}
 
function selectOption(selElement=''){
    hideAll(); 
    document.getElementById(selElement+'-body').style.display = 'block';
    document.getElementById(selElement+'-button').style.display = 'none';

}

@endsection
@section('contenido')
                 
<div class="subtitle" style="max-width:450px;">It's simple! Write an question with the quantity of electors and get a list of codes for vote, send each code to each elector and later see the results with a question code. 
<p> <strong> Coming soon... </strong> you can use the codes to vote and the question code for new votes.
</p>
</div>

<button type="submit" class="submit" style="background:#223353;margin-top:10px;"  id='create-button' onclick="selectOption('create');">Create</button>
                <div class="mt-2 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" id='create-body' style='display:none;'>
                    <div class="grid grid-cols-1 md:grid-cols-1">
                        <div class="p-8">
                            
                            <div style="padding:20px;">
                                <div class="text-gray-600 dark:text-gray-400 text-sm">
                                    <form action="{{ route('create') }}" method='POST'> 
	                                @csrf

                                    <div class="title">Create</div>
                                    
                                    <div class="input-container ic1">
                                        <input id="description" name="description" class="input" type="text" placeholder=" " maxlength="100" required/>
                                        <div class="cut" style="width: 80px;"></div>
                                        <label for="question" class="placeholder">Question</label> 
                                        The question to vote
                                    </div>
                                    <div class="input-container ic1">
                                        <input id="electors" name="electors" class="input" type="number" placeholder=" " value='10' style="width: 140px;" maxlength="2" required  /> <br>
                                        <div class="cut" style="width: 60px;" ></div>
                                        <label for="electors" class="placeholder">Electors</label>
                                        How many people vote thist question?
                                    </div>
                                    <br>
                                    {!! htmlFormSnippet() !!}
                                          
                                    <button type="submit" class="submit">Create</button>
                                    </form>
                                     
                                    
                                </div>
                            </div>  
                        </div>  
                    </div>
                </div>
             
                
                <button type="submit" class="submit" style="background:#223353;margin-top:10px;" id='vote-button' onclick="selectOption('vote');">Vote</button>
                <div class="mt-2 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" id='vote-body' style='display:none;'>
                    <div class="grid grid-cols-1 md:grid-cols-1">
                        <div class="p-8">
                            
                            <div style="padding:20px;">
                                <div class="text-gray-600 dark:text-gray-400 text-sm">
                                    <form action="{{ route('create') }}" method='POST'> 
	                                @csrf

                                    <div class="title">Vote</div>
                                    <div class="subtitle">If you have a code for vote, you can write here for answer the question and vote!</div>
                                    <div class="input-container ic1">
                                        <input id="description" name="description" class="input" type="text" placeholder=" " maxlength="6" required/>
                                        <div class="cut" style="width: 80px;"></div>
                                        <label for="question" class="placeholder">Key-code</label> 
                                        The key code for vote a question
                                    </div>
                                    <br>
                                    {!! htmlFormSnippet() !!}
                                    
                                    <button type="submit" class="submit">Vote</button>
                                    </form>
                                     
                                    
                                </div>
                            </div>  
                        </div>  
                    </div>
                </div>

                <button type="submit" class="submit" style="background:#223353;margin-top:10px;" id='view-button' onclick="selectOption('view');">View Results</button>
                <div class="mt-2 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" id='view-body' style='display:none;'>
                    <div class="grid grid-cols-1 md:grid-cols-1">
                        <div class="p-8">
                            
                            <div style="padding:20px;">
                                <div class="text-gray-600 dark:text-gray-400 text-sm">
                                    <form action="{{ route('view') }}" method='POST'> 
	                                @csrf

                                    <div class="title">View</div>
                                    <div class="subtitle">The status and result with your question-code.  </div>
                                    <div class="input-container ic1">
                                        <input id="description" name="code" class="input" type="text" placeholder=" " maxlength="6" required/>
                                        <div class="cut" style="width: 80px;"></div>
                                        <label for="question" class="placeholder">Code</label> 
                                        The question code
                                    </div>  
                                    <br>
                                    {!! htmlFormSnippet() !!}
                                     
                                    <button type="submit" class="submit">View</button>
                                    </form>
                                     
                                    
                                </div>
                            </div>  
                        </div>  
                    </div>
                </div>

<p>
<div class="subtitle" style="max-width:450px;">More than <strong>1000</strong> questions created.</div>
</p>
@endsection