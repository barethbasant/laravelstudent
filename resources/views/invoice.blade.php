  

    <table class="table" width="100%">
        <thead class="thead-dark">
        <tr>
            <th width="10%" scope="col">#</th>
            <th width="10%" scope="col">FName</th>
            <th width="10%" scope="col">LName</th>
            <th width="10%" scope="col">DOB</th>
            <th width="10%" scope="col">Course</th>
            <th width="10%" scope="col">Branch</th>
            <th width="10%" scope="col">City</th>
          
            </tr>
        </thead>
        <tbody>
        @foreach($registrations as $registration)
            <tr>
            <th scope="row">{{$loop->index +1}}</th>
            <td>{{$registration->fname}}</td>
            <td>{{$registration->lname}}</td>
            <td>{{$registration->dob}}</td>
            <td>{{$registration->courses->name}}</td>
            <td>{{$registration->branches->name}}</td>  
            <td>{{$registration->cities->name}}</td>            
            
            </tr>  
        @endforeach             
        </tbody>
    </table>
 