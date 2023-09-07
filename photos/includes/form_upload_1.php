    <!-- 
    <div class="page-content">
        <button id="openuploadModal" class="premium-button">Unlock Premium</button>
    </div> 
    -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span id="closeModal" class="close">&times;</span>
            <?php echo $message; ?>
            <form action="http://localhost/photos/" method="post" enctype="multipart/form-data">
                <div class="form-group upload-submit">
                    <input type="text" name="title" class="form-control" placeholder="Write The Title">
                </div>
                <div class="form-group upload-submit">
                    <input type="text" name="caption" class="form-control" placeholder="Write The Caption">
                </div>
                <div class="form-group upload-submit">
                    <input type="file" name="file_upload">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="upload-submit">
                </div>
            </form>
        </div>
    </div>
