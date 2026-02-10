 <div id="simpleModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 9999; overflow-y: auto; padding: 20px;">
    <div style="background: white; max-width: 500px; margin: 50px auto; border-radius: 15px; position: relative;">
        <div style="padding: 25px;">
            <!-- Close Button -->
            <button type="button" onclick="closeSimpleModal()" 
                    style="position: absolute; top: 15px; right: 15px; background: #f8f9fa; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; border: none; cursor: pointer; transition: all 0.3s ease;">
                <i class="fas fa-times" style="font-size: 1.2rem; color: #333;"></i>
            </button>
            
            <div style="text-align: center; margin-bottom: 5px;">
                <!-- Gambar Customer -->
                <img id="simpleModalImage" 
                     src="" 
                     alt="Customer"
                     style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%; border: 3px solid #f8f9fa; margin-bottom: 15px;">
                
                <!-- Nama Customer -->
                <h3 id="simpleModalName" style="font-size: 22px; font-weight: 700; color: #333; margin-bottom: 10px;"></h3>
                
                <!-- Rating -->
                <div id="simpleModalRating" style="color: #FFD700; margin-bottom: 10px;"></div>
                
                <!-- Tanggal -->
                <p id="simpleModalDate" style="font-size: 14px; display: inline-block; color: #666;">
                    <i class="far fa-calendar-alt me-2"></i>
                    <span id="simpleModalDateText"></span>
                </p>
            </div>
            
            <!-- Deskripsi Lengkap -->
            <div id="simpleModalDescription" 
                 style="font-size: 15px; line-height: 1.7; color: #555; text-align: left; padding: 15px; background: #f9f9f9; border-radius: 8px; max-height: 400px; overflow-y: auto;">
            </div>
        </div>
    </div>
</div>