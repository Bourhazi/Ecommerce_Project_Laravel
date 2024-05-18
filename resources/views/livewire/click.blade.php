<div class="container mt-5 text-center">
    <button type="button" wire:click="clickEvt" class="btn btn-primary">Click Here</button>
    <button type="button" wire:click="trackClickEvt({{$studentId}})" class="btn btn-success">Click Here</button>
    <p class="mt-4">{{ $msg }}</p>
</div>
