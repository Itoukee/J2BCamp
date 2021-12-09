const billSchema = {
    type: "object",
    required: ["bill_ids", "training_infos", "client_infos","comedian_infos","agency_infos"],
    properties: {
        "bill_ids": {
            type: "object",
            required: ["bill_id", "case_number", "traineeship_number"],
            properties: {
                "bill_id": {
                    type: "integer",
                    minimum: 1,
                },
                "case_number": {
                    type: "string",
                    pattern: "[0-9]{2}-[0-9]{2,}"
                },
                "traineeship_number": {
                    type: "string",
                    minLength: 2,
                },
                "bdc_number": {
                    type: "integer",
                    minimum: 1,
                },

            }
        },
        "training_infos": {
            type: "object",
            required: ["training_date", "price", "days","km"],
            properties: {
                "training_date": {
                    type: "string",
                    format: "date"
                },
                "price": {
                    type: "integer",
                    minimum: 1
                },
                "days": {
                    type: "integer",
                    minimum: 1
                },
                "km":{
                    type:"integer",
                    minimum:1
                }


            },
        },
        "client_infos": {
            type: "object",
            required: ["business_name","address","city"],
            properties: {
                "business_name": {
                    type: "string",
                },
                "address": {
                    type: "string",
                },
                "city": {
                    type: "string",
                },

            }
        },
        "comedian_infos": {
            type: "object",
            required: ["name","address","city","email","phone"],
            properties: {
                "name":{
                    type:"string"
                },
                "address": {
                    type: "string",
                },
                "city": {
                    type: "string",
                },
                "email": {
                    type: "string",
                    format: "email"
                },
                "phone": {
                    type: "string",
                    pattern:"([0-9]{2} ?){5}"
                },

            }
        },
        "agency_infos": {
            type: "object",
            required: ["tva_intra"],
            properties: {
                "tva_intra": {
                    type: "string",
                    pattern:"^FR[0-9]{11}"
                },


            }
        }


    }

}


module.exports = billSchema