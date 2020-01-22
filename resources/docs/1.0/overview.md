# API
---

- [First Section](#section-1)

<a name="section-1"></a>

##  POST
    * http://127.0.0.1:8000/api/pendaftaranLoket/store
    * raw
        * JSON(application/json)
            {          
                "kode_cobranding" :7070,
                "nama_cobranding": "PLN",
                "kode_loket": 6060,	
                "nama_loket" : "Travelista",
                "deposit_saat_ini": 1000000,
                "waktu_pendaftaran": "2019-10-3"
            }

        * Response '201'
            [
                "success"
            ]

## GET

    * http://127.0.0.1:8000/api/pendaftaranLoket
    * Response
        "data": [
            {
               "id": 1,
                "kode_cobranding" :7070,
                "nama_cobranding": "PLN",
                "kode_loket": 6060,	
                "nama_loket" : "Travelista",
                "deposit_saat_ini": 1000000,
                "waktu_pendaftaran": "2019-10-3"
            }
        ]

## POST
    *https://dashboard.ppobnusantara.co.id/api/rekening
     * raw
        * JSON(application/json)
           {
                "kode_loket":"AB00003",
                "nama_loket":"Loket XXXXX",
                "kode_cobranding":"CB01",
                "nama_cobranding":"PPOB ",
                "nama_bank":"BUKOPIN",
                "rekening":"100 2477 048",
                "status":"Approve",
                "waktu_approve":"2019-01-20 10:50:11"
            }

        * Response '201'
            [
                "success"
            ]


