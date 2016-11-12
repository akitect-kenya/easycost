<div role="tabpanel" class="tab-pane" id="costing">
    <div class="sheet">
        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <table class="table">
            <caption>
                New costing table
            </caption>
            <thead>
            <tr>
                <th>Date</th>
                <th>SKU</th>
                <th>Number Produced</th>
                <th>Batch No.</th>
                <th>Cost</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>10/11/2016</td>
                <td>250g</td>
                <td>4</td>
                <td>4343</td>
                <td>400</td>
                <td>
                    <button class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td>02/02/2016</td>
                <td>500g</td>
                <td>500</td>
                <td>909</td>
                <td>50,000</td>
                <td>
                    <button class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <input name="date" id="date" type="date" class="form-control field">
                </td>
                <td>
                    <select name="sku" id="sku" class="form-control field">
                        <option value="">SKU</option>
                    </select>
                </td>
                <td>
                    <input name="number" id="number" type="text" class="form-control field">
                </td>
                <td>
                    <input name="batchNo" id="batchNo" type="text" class="form-control field">
                </td>
                <td>
                    <input disabled value="400,400" name="cost" id="cost" type="text" class="form-control field">
                </td>
                <td>
                    <button class="btn btn-primary">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row col-md-12" style="float: right;">
        <span class="pull-right">
            <button class="btn btn-primary">Save</button>
            <button class="btn btn-default">Cancel</button>
        </span>
    </div>
</div>
