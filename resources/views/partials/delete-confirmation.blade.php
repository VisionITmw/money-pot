<div class="dialog" data-role="dialog" id="delete-dialog">
    <div class="dialog-title"> <i class="mif mif-warning"></i>&nbsp;Confirm Deletion</div>
    <div class="dialog-content">
        <p id="delete-message">

        </p>
        <form action="" method="POST" id="delete-form">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
        </form>
    </div>
    <div class="dialog-actions">
        <button onclick="document.getElementById('delete-form').submit()" class="button bg-red fg-white ">Yes</button>
        <button class="button  bg-primary  js-dialog-close">Cancel</button>
    </div>
</div>
