const kasusz = document.getElementById('kasus');
let semuadata = [];

const loadKasus = async () => {
    try {
        const res = await fetch('https://covid19-api.org/api/status');
        semuadata = await res.json();
        displayKasus(semuadata);
    } catch (err) {
        console.error(err);
    }
};

const displayKasus = (country) => {

    const htmlString = country.map((data) => {
            if(data.country == "ID"){
                let tampung = "";
                var i;
                for (i = 0; i < 10; i++) {
                  tampung += (data.last_update[i]);
                }
                let waktu = "";
                for (i = 14; i < 19; i++) {
                  waktu += (data.last_update[i]);
                }
                
                return `
                <p style="text-align: center;">Last Update : ${tampung} - ${waktu} </p>
                <div class="col-lg col-sm-12 borcol">
                    <div class="box flex">
                        <p class="text-warning">${data.cases} CASES</p>
                    </div>
                </div>
                &emsp;
                <div class="col-lg col-sm-12 borcol">
                    <div class="box flex">
                        <p class="text-danger">${data.deaths} DEATH</p>          
                    </div>
                </div>
                &emsp;
                <div class="col-lg col-sm-12 borcol">
                    <div class="box flex">
                        <p class="text-success">${data.recovered} RECOVERED</p>
                    </div>
                </div>
                `;
            }
            
        }).join('');

    kasus.innerHTML = htmlString;
};


loadKasus();