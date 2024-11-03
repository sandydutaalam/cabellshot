@extends('layouts.admin')

{{-- <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
</script> --}}

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        new nicEditor().panelInstance('txt1');
    });
</script>


@section('content')
    <h2 class="content-heading">Update About Us</h2>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Update About Us</h3>
        </div>
        <div class="block-content">
            <form method="POST" action="{{ route('admin.pages.update.about') }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-12" for="register1-email">Page Title:</label>
                    <div class="col-12">
                        <input type="text" name="pagetitle" class="form-control" value="{{ $page->title }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12" for="register1-email">Page Description:</label>
                    <div class="col-12">
                        <textarea id="txt1" type="text" name="pagedes" class="form-control" required>{{ $page->description }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-alt-success">
                            <i class="fa fa-plus mr-5"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
