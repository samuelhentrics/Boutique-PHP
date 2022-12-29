<html>
<script>
  async function modifierquantitePanier(id, nombre) {
if(nombre>0)
    try {
      const response = await fetch(`./rsc/fonctions/modifierPanier.php?idCD=${id}&quantite=${nombre}`, {
        method: 'GET'
      });
      if (response.ok) {
        location.reload()
      } else {
        throw new Error('Erreur de modification panier');
      }
    } catch (error) {
      console.error(error);
    }
  else {
    try {
        const response = await fetch(`./rsc/fonctions/supprimerPanier.php?idCD=${id}`, {
          method: 'GET'
        });
        if (response.ok) {
          location.reload()
        } else {
          throw new Error('Erreur de suppression panier');
        }
      } catch (error) {
        console.error(error);
      }
  }
  }
</script>

</html>