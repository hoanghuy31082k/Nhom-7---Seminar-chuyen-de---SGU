<div>
    <form wire:submit.prevent="addtocart('{{ $item->id }}')">
        <input type="submit" value="Thêm vào giỏ">
    </form>
</div>
