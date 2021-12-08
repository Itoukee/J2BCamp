const billSchema = {
    type: "object",
    required: ["bill_ids", "bill_infos", "client_infos"],
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
                    type: "integer",
                    minimum: 1,
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
        "bill_infos": {
            type: "object",
            required: ["training_date", "comedian_name"],
            properties: {
                "training_date": {
                    type: "string",
                    format: "date"
                },
                "comedian_name": {
                    type: "string",
                },

            }
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
        }

    }

}


module.exports = billSchema