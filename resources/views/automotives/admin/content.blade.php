<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if(session()->has('success'))
                        <div class="container">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    @if(session()->has('danger'))
                        <div class="container">
                            <div class="alert alert-danger">
                                {{ session('danger') }}
                            </div>
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>