@extends('layaout')
@section('contente')
<div class="container mt-5">
    <h2>Faire un don</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<form id="donForm" method="POST" action="{{ route('don.store') }}">
    @csrf
    <div class="mb-3">
        <label>Nom du donateur</label>
        <input type="text" name="nom_donateur" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Type de don</label>
        <select name="type_don" id="type_don" class="form-control" required>
            <option value="">-- Choisir --</option>
            <option value="espece">Espèces</option>
            <option value="nature">Nature</option>
        </select>
    </div>

    <div id="especeFields" style="display:none;">
        <div class="mb-3">
            <label>Montant (XOF)</label>
            <input type="number" name="montant" class="form-control">
        </div>
        <div class="mb-3">
            <label>Moyen de paiement</label>
            <select name="moyen_paiement">
                <option value="mobile_money">Mobile Money</option>
                <option value="carte_bancaire">Carte Bancaire</option>
            </select>
        </div>
    </div>

    <div id="natureFields" style="display:none;">
        <div class="mb-3">
            <label>Quantité</label>
            <input type="number" name="quantite" class="form-control">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
    </div>

    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control" required>
    </div>

    <!-- Champ caché pour stocker l'ID transaction FedaPay -->
    <input type="hidden" name="transaction_id" id="fedapay_transaction_id">

    <button type="button" id="submitBtn" class="btn btn-primary" onclick="payWithFedaPay(event)">
        Payer / Enregistrer
    </button>
</form>
</div>
<script src="https://cdn.fedapay.com/checkout.js"></script>
<script>
const typeDon = document.getElementById('type_don');
const especeFields = document.getElementById('especeFields');
const natureFields = document.getElementById('natureFields');

typeDon.addEventListener('change', function () {
    especeFields.style.display = this.value === 'espece' ? 'block' : 'none';
    natureFields.style.display = this.value === 'nature' ? 'block' : 'none';
});

function payWithFedaPay(event) {
    event.preventDefault();

    if(typeDon.value === 'nature') {
        document.getElementById('donForm').submit();
        return;
    }

    const montant = document.querySelector('input[name="montant"]').value;
    if(!montant || montant < 100){
        alert("Veuillez entrer un montant valide (min 100 XOF)");
        return;
    }

    // Initialise FedaPay
    const checkout = FedaPay.init({
        public_key: "{{ env('FEDAPAY_PUBLIC_KEY') }}",
        transaction: {
            amount: montant,
            description: "Don à Jeunesse WADAGNI"
        },
        customer: {
            firstname: document.querySelector('input[name="nom_donateur"]').value
        },
         onComplete: function(response) {
            // ⚡ Remplir le champ transaction_id
            document.querySelector('input[name="transaction_id"]').value = response.transaction.id;

            // ⚡ Soumettre le formulaire après que transaction_id soit défini
            document.getElementById('donForm').submit();
        }
    });

    checkout.open();
}
</script>





 @endsection