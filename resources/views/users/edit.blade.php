

<div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="Edit User" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close_edit_modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id" name="id" v-model="id">
                <div class="mb-3">
                    <label for="name" class="form-label">Fullname</label>
                    <input type="name" class="form-control" id="name" name="name" v-model="name" placeholder="fullname">
                    <div class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" v-model="email" placeholder="name@example.com">
                    <div class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" v-model="phone" placeholder="xxxxxxxxxx">
                    <div class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="rfc" class="form-label">RFC</label>
                    <input type="text" class="form-control" id="rfc" name="rfc" v-model="rfc" placeholder="RFC">
                    <div class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3" v-model="notes"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-block btn-outline-primary"  @click="update_user()">save changes</button>
                <button type="button" class="btn btn-block btn-outline-secondary" data-bs-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>
