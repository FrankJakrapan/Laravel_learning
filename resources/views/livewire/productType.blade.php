<div>
    <h1>Product Type</h1>

    <form wire:submit.prevent="save">
        <div class="card">
            <div class="card-header">
                <div class="card-title">ประเภทสินค้า</div>
            </div>
            <div class="card-body">
                <div>Name</div>
                <input type="text" class="form-control" wire:model="name" />
                <button type="submit" class="btn btn-primary mt-3">Save</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th width="110px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productTypes as $productType)
                <tr>
                    <td>{{ $productType->name }}</td>
                    <td class="text-center">
                        <a class="btn btn-primary" wire:click="edit{{ $productType->id }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-danger" wire:click="remove{{ $productType->id }}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>